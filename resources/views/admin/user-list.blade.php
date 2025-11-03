@extends('admin.layouts.master')
@section('content')
    <div class="user-wrapper">
        <h1>Users List</h1>
        <table class="table table-striped">
            <tr>
                <td>Id</td>
                <td>User Name</td>
                <td>User Email</td>
                <td>Action</td>
            </tr>
            @foreach ($users as $user)
 
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item btnAdd" href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#addBalanceModal" data-action="{{ route('admin.addBalance.send', $user->id )}}">Add Balance</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Subtract Balance</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>






    <!-- Modal -->
    <div class="modal fade" id="addBalanceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Balance</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 input-wrapper">
                            <input type="number" step="any" name="balance" class="form-control"
                                placeholder="Please provide a positive amount">
                            <div class="amount-type">USD</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
         $('.btnAdd').on('click', function() {
            const action = $(this).attr('data-action');
            const modal = $('#addBalanceModal');
            
            modal.modal('show');
            console.log(modal);
            
        })
    </script>
@endpush