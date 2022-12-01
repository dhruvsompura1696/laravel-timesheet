@extends('layouts.home')

@section('content')
@php
$user_data = get_user_data();
$role = get_current_user_role();
@endphp
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title search_user_wrapper">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search user" />
                        </div>
                    </div>
                    @if($role == 0)
                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end add_user_btn" data-kt-user-table-toolbar="base">                                                        
                                <a href="/add_user" type="button" class="btn btn-primary">
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                Add User</a>
                            </div>
                            <div class="delete_status d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                <span class="me-2 selected_count"></span>Selected</div>
                                <button type="button" class="btn btn-danger delete_selected_users">Delete Selected</button>
                            </div>                                                
                        </div>
                    @endif
                </div>
                <div class="card-body py-4">
                    @if(Session::has('status'))
                        <div class="alert alert-success">{{Session::get('status')}}</div>
                        <script>
                            Swal.fire('{{Session::get('status')}}', '', 'info');
                        </script>
                    @endif
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="">
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                @if($role == 0)
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input remove_all_users_checkbox"  type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                        </div>
                                    </th>
                                @endif
                                <th class="min-w-125px">User</th>
                                <th class="min-w-125px">Mobile</th>
                                @if($role == 0)
                                    <th class="min-w-125px">Role</th>    
                                @endif                            
                                <th class="min-w-125px">Joined Date</th>
                                @if($role == 0)
                                    <th class="text-end min-w-100px">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            
                            @if(isset($users))
                                @foreach($users as $user_key => $user)
                                    {{-- {{dd($user)}} --}}
                                    <tr>
                                        @if($role == 0)
                                            <td>
                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input single_remove_checkbox" value="{{$user['id']}}" type="checkbox" value="1" />
                                                </div>
                                            </td>
                                        @endif
                                        <td class="d-flex align-items-center">
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="view.html">
                                                    <div class="symbol-label">

                                                        @if($user['profile_picture'] != '' )
                                                            <img src="{{url('/storage/images/'.$user['profile_picture'])}}" alt="<?php echo $user['fname'].' '.$user['lname']; ?>" class="w-100" />
                                                        @else
                                                            <span class="symbol-label bg-light-primary text-primary fs-6 fw-bolder">{{$user['fname'][0]}}</span>
                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="view.html" class="text-gray-800 text-hover-primary mb-1">{{$user['fname'].' '.$user['lname']}}</a>
                                                <span>{{$user['email']}}</span>
                                            </div>
                                        </td>
                                        <td>{{$user['mobile_number'] != '' ? $user['mobile_number'] : '-'}}</td>
                                        @if($role == 0)
                                            <td>{{$user['admin_type'] == 0 ? 'Administrator' : 'Employee' }}</td>
                                        @endif
                                        <td> {{date('d F Y',strtotime($user['created_at']))}}</td>
                                        @if($role == 0)
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                                                    <span class="svg-icon svg-icon-5 m-0">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                </a>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                    <div class="menu-item px-3">
                                                        <a href="/users/edit/{{$user['id']}}/" class="menu-link px-3">Edit</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="javascript:;" class="menu-link px-3" onClick="delete_user({{$user['id']}});" >Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif                                                      
                        </tbody>
                    </table>
                    <div class="pagination float-end">
                    {{ $users->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.remove_all_users_checkbox').click(function(){
            if($('.remove_all_users_checkbox').prop('checked') == true)
            {
                $('.single_remove_checkbox').prop('checked',true);
            }
            else
            {
                $('.single_remove_checkbox').prop('checked',false);
            }
        });

        $('.remove_all_users_checkbox,.single_remove_checkbox').click(function(){
            if($('.single_remove_checkbox').length > 0)
            {
                let total_checked = 0;
                let ids = [];
                $('.single_remove_checkbox').each(function(){
                    if($(this).prop('checked') == true)
                    {
                        total_checked = total_checked+1;
                        ids.push($(this).val());
                    }
                });
                console.log('total_checked',total_checked);
                console.log('ids',ids);
                $('.selected_count').text(total_checked > 0 ? total_checked : '');
                if(total_checked > 0)
                {
                    $('.add_user_btn').addClass('d-none');
                    $('.delete_status').removeClass('d-none');
                    $('.delete_selected_users').attr('onclick',`delete_user('${ids.join()}')`);
                }
                else
                {
                    $('.add_user_btn').removeClass('d-none');
                    $('.delete_status').addClass('d-none'); 
                    $('.delete_selected_users').removeAttr('onclick');
                }
            }
        })
    });

    function delete_user(user_ids)
    {
        Swal.fire({
            text: "Are you sure you want to delete selected users?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
        }).then((result) => {
            console.log(user_ids);
            console.log(window.location.origin+`/users/delete/${user_ids}`);
            
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location.href = window.location.origin+`/users/delete/${user_ids}`;
            } else if (result.isDenied) {
                // Swal.fire('Changes are not saved', '', 'info')
            }
        });
    }

</script>
<!--end::Content-->
@endsection
