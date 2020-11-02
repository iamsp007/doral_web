@extends('layouts.admin.default')
@section('content')
<div class="row">
    <div class="col-12 col-sm-4">
        <div class="app-card">
            <div class="user-photo">
                <div class="userContent">
                    <div>
                        <img src="../assets/img/user/01.png" class="user_photo" alt=""
                            srcset="../assets/img/user/01.png">
                    </div>
                    <div class="user-info">
                        <h1 class="title">Doral Corporation</h1>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-primary btn-sm btn-green mr-2"
                        name="save_next">Accept</button>
                    <button type="submit" class="btn btn-primary btn-sm btn-pink"
                        name="save_next">Reject</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-8">
        <div class="row">
            <div class="col-12">
                <!-- Company Information Start Here -->
                <div class="app-card">
                    <div class="card-header pt-3 pb-3">
                        Company Information
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <ul class="form-data">
                                    <li>
                                        <label class="label">Referral Type:</label>
                                        <p class="t5">Insurance</p>
                                    </li>
                                    <li>
                                        <label class="label">Company Name:</label>
                                        <p class="t5">Doral Corporation</p>
                                    </li>
                                    <li>
                                        <label class="label">Phone No:</label>
                                        <p class="t5">+91 8866888888 </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-6">
                                <ul class="form-data">
                                    <li>
                                        <label class="label">Company Name:</label>
                                        <p class="t5">Doral Corporation</p>
                                    </li>
                                    <li>
                                        <label class="label">Email:</label>
                                        <p class="t5"><a
                                                href="mailto:example@example.com">example@example.com</a>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Perfosnal Information End Here -->
            </div>
        </div>
    </div>
</div>
@stop