<form id="search_form" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="row">
                <div class="col-3 col-sm-3 col-md-3">
                    <div class="input-group">
                        <select class="user_name form-control select2_dropdown" id="user_name" name="user_name"></select>
                    </div>
                </div>
                <div class="col-3 col-sm-3 col-md-3">
                    <div class="input-group">
                        <select name="gender" class="form-control form-control-lg">
                            <option value="">Select a gender</option>
                            @foreach (config('select.gender') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3 col-sm-3 col-md-3">
                    <select class="form-control form-control-lg" name="designation_id" id="designation_id">
                        <option value="">Select Designation</option>
                        @foreach ($designations as $designation)
                            <option value="{{$designation->id}}">{{$designation->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3 col-sm-3 col-md-3">
                    <div class="input-group">
                        <x-text name="email" class="email" id="email" placeholder="Email"/></td>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-3 col-sm-3 col-md-3">
                    <div class="input-group">
                        <x-text name="date_of_birth" class="date_of_birth" id="date_of_birth" placeholder="Date of birth"/></td>
                    </div>
                </div>
              
                <div class="col-3 col-sm-3 col-md-3">
                    <button class="btn btn-primary" type="button" id="filter_btn">Apply</button>
                    <button class="btn btn-primary reset_btn" type="button" id="reset_btn">Reset</button>
                </div>
            </div>
        </div>
    </form>