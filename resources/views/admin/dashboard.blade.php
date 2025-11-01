<x-app-layout>
    @section('title',"Admin Dashboard")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                            {{ __('Users') }}
                            <a href="{{ route('admin.user.add') }}" class="btn btn-sm btn-warning" style="float:right"><i class="fas fa-plus"></i>&nbsp;Add User</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($users) > 0) 
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $user['name'] }}</td>
                                            <td>{{ $user['email'] }}</td>
                                            <td class="first-letter-uppercase">
                                                {{ ucfirst($user->roles->first()?->name) ?? 'No Role' }}
                                            </td>
                                            <td class="first-letter-uppercase">{{ $user['status'] }}</td>
                                            <td>
                                                <a href="{{ route('admin.user.edit', $user['id']) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.user.delete', $user['id']) }}" class="btn btn-sm btn-danger delete-btn" data-url="{{ route('admin.user.delete', $user['id']) }}"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else 
                            {{ __('No data found') }}    
                        @endif                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.delete-btn').forEach(function(button) {
                    button.addEventListener('click', function(event) {
                        event.preventDefault(); // Prevent the default link action
                        let url = this.getAttribute('data-url');
                        if (confirm('Are you sure you want to delete this user?')) {
                            window.location.href = url;
                        }
                    });
                });
            });
        </script>    
    @endpush
</x-app-layout>
