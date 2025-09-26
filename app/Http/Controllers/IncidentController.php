namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function index(Request $req)
    {
        $q = Incident::query()->with(['reporter','assignee']);

        // Filters
        if ($s = $req->string('q')->toString()) {
            $q->where(function($x) use($s){
                $x->where('code','like',"%$s%")
                  ->orWhere('title','like',"%$s%");
            });
        }
        if ($st = $req->string('status')->toString()) {
            $q->where('status',$st);
        }
        if ($sev = $req->string('severity')->toString()) {
            $q->where('severity',$sev);
        }

        $incidents = $q->latest()->paginate(12)->withQueryString();
        return view('pages.incidents.index', compact('incidents'));
    }

    // ไว้ค่อยเพิ่ม create/store/show/edit ภายหลัง
}
