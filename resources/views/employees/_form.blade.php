<div class="grid-3">
  <div>
    <label>รหัสพนักงาน</label>
    <input class="input" type="text" name="code" value="{{ old('code', $employee->code ?? '') }}" required>
  </div>
  <div>
    <label>ชื่อ-นามสกุล</label>
    <input class="input" type="text" name="full_name" value="{{ old('full_name', $employee->full_name ?? '') }}" required>
  </div>
  <div>
    <label>ชื่อเล่น</label>
    <input class="input" type="text" name="nickname" value="{{ old('nickname', $employee->nickname ?? '') }}">
  </div>
</div>

<div class="grid-3" style="margin-top:1rem;">
  <div>
    <label>สาขา</label>
    <select class="input" name="branch_id">
      <option value="">เลือกสาขา</option>
      @foreach($branches as $b)
        <option value="{{ $b->id }}" @selected(old('branch_id', $employee->branch_id ?? '')==$b->id)>{{ $b->name }}</option>
      @endforeach
    </select>
  </div>
  <div>
    <label>แผนก</label>
    <select class="input" name="department_id">
      <option value="">เลือกแผนก</option>
      @foreach($departments as $d)
        <option value="{{ $d->id }}" @selected(old('department_id', $employee->department_id ?? '')==$d->id)>{{ $d->name }}</option>
      @endforeach
    </select>
  </div>
  <div>
    <label>ตำแหน่ง</label>
    <input class="input" type="text" name="position" value="{{ old('position', $employee->position ?? '') }}">
  </div>
</div>

<div class="grid-2" style="margin-top:1rem;">
  <div>
    <label>อีเมล</label>
    <input class="input" type="email" name="email" value="{{ old('email', $employee->email ?? '') }}">
  </div>
  <div>
    <label>เบอร์โทร</label>
    <input class="input" type="text" name="phone" value="{{ old('phone', $employee->phone ?? '') }}">
  </div>
</div>

<div style="margin-top:1rem;">
  <label><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $employee->is_active ?? true))> ใช้งาน</label>
</div>
