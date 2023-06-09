@extends('_layout.html_app')

@section('content')
    <div class="card" style="min-height:700px">
        <div class="card-header border-bottom">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 ps-3">
                    <h5 class="card-title"><strong>API {{ $data->name ?? "To Be Announced" }}</strong></h5>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary btn-pill" href="{{ route('main_dealer.api.upsert', ['main_dealer_id' => $data->id]) }}">Add New API</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>
                                Action
                            </th>
                            <th>
                                Feature
                            </th>
                            <th>
                                Url
                            </th>
                            <th>
                                Status Code
                            </th>
                            <th>
                                Response Time
                            </th>
                            <th>
                                Response Body
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data->apis as $item)
                            <tr>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-outline-tertiary" data-bs-toggle="dropdown"><i class="fas fa-fw fa-ellipsis-h"></i></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item text-warning" href="{{ route('api.upsert', ['main_dealer_id' => $data->id, 'id' => $item->id]) }}">Edit</a>
                                            <li><hr class="dropdown-divider"></li>
                                            <form method="POST" action="{{ route('api.delete_process', ['main_dealer_id' => $data->id, 'id' => $item->id]) }}">
                                                @csrf
                                                <input name="main_dealer_id" value="{{ $data->id }}" hidden>
                                                <input name="id" value="{{ $item->id }}" hidden>
                                                <button class="dropdown-item text-danger" type="submit">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                                <td class="text-nowrap">
                                    {{$item['back_end']['name']}} | 
                                    {{$item['feature']['name']}}
                                </td>
                                <td>
                                    {{$item['back_end']['base_url']}}<br>
                                    {{$item['path']}}
                                </td>
                                <td class="text-center">
                                    @if ($item['is_check_status_code'] == true) 
                                        <i class='fas fa-check-circle'></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item['is_check_response_time'] == true) 
                                        <i class='fas fa-check-circle'></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item['is_check_response_body'] == true) 
                                        <i class='fas fa-check-circle'></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item['is_push_email'] == true) 
                                        <i class='fas fa-check-circle'></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($item['is_active'] == true)
                                        <span class="badge bg-success"> active </span>
                                    @else
                                        <span class="badge bg-warning"> nonactive </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function(){
            $('.table').DataTable({
            });
        });
    </script>
@endpush