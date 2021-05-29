<form id="search_form" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <div class="row">
            <div class="col-3 col-sm-3 col-md-3">
                <select class="form-control form-control-lg" name="referal_id" id="referal_id">
                    <option value="">Select referral type</option>
                    @foreach ($referrals as $referral)
                        <option value="{{$referral->id}}">{{$referral->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3 col-sm-3 col-md-3">
                <select class="form-control form-control-lg" name="company_id" id="company_id">
                    <option value="">Select company</option>
                    @foreach ($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3 col-sm-3 col-md-3">
                <div class="input-group">
                    <x-text name="email" class="email" id="email" placeholder="Email"/></td>
                </div>
            </div>
            <div class="col-3 col-sm-3 col-md-3">
                <button class="btn btn-primary" type="button" id="filter_btn">Apply</button>
                <button class="btn btn-primary reset_btn" type="button" id="reset_btn">Reset</button>
            </div>
        </div>
    </div>
</form>