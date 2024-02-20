@extends('layouts.dashboard.mainlayout')
@section('content')
    <main id="main" class="main p-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="head-title my-3">
                        <h2 class="text-center m-0">الأشعارت</h2>
                    </div>
                    <table class="table table-striped text-center">
                        <thead>
                            <th>
                                الأشعار
                            </th>
                            <th>
                                التاريخ
                            </th>
                            <th>
                                الحالة
                            </th>
                            <th>
                                حذف
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($notifications as $notification)
                                <tr>
                                    <td>
                                        <p>{!! $notification->text !!}</p>
                                    </td>
                                    <td>
                                        {{ $notification->created_at->format('Y/m/d h:i A') }}
                                    </td>
                                    <td>
                                        @if ($notification->status == 'reject')
                                            <div id="notification-state" class="col-7 d-flex gap-1 justify-content-between">
                                                <button disabled class="btn btn-danger fw-bold py-0 px-4">تم الرفض</button>
                                            </div>
                                        @elseif($notification->status == 'confirm')
                                            <div id="notification-state" class="col-7 d-flex gap-1 justify-content-between">
                                                <button disabled class="btn btn-success fw-bold py-0 px-4">تمت
                                                    الموافقة</button>
                                            </div>
                                        @else
                                            <div id="notification-state" class="col-7 d-flex gap-1 justify-content-between">
                                                <button class="btn btn-success fw-bold py-0 px-4"
                                                    onclick="changeNotificationStatus({{ $notification->id }},this,'confirm')">قبول</button>
                                                <button class="btn btn-danger fw-bold py-0 px-4"
                                                    onclick="changeNotificationStatus({{ $notification->id }},this,'reject')">رفض</button>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <i class="fa-solid fa-trash-can notification-delete-icon"
                                                onclick="deleteNotification({{ $notification->id }},this)"></i>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
