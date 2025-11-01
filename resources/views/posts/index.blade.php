<x-app-layout>
    @section('title',"Posts")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                            {{ __('Announcements') }}
                            @if(auth()->user()->hasRole('admin'))
                                <a href="{{ route('admin.post.add') }}" class="btn btn-sm btn-warning" style="float:right"><i class="fas fa-plus"></i>&nbsp;Add Announcement</a>
                            @else
                                <a href="{{ route('teacher.post.add') }}" class="btn btn-sm btn-warning" style="float:right"><i class="fas fa-plus"></i>&nbsp;Add Announcement</a>
                            @endif                        
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($posts) > 0) 
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Post By</th>
                                        <th scope="col">Description</th>
                                        @if(auth()->user()->hasRole('admin'))
                                            <th scope="col">Action</th>
                                        @elseif(auth()->user()->hasRole('teacher'))    
                                            <th scope="col">Target To</th>
                                        @endif    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $post['title'] }}</td>
                                            <td>@if(auth()->user()->name === $post['author']['name']) You @elseif(auth()->user()->hasRole('admin')) Admin @else {{ $post['author']['name'] }} @endif</td>
                                            <td>{{ $post['description'] }}</td>
                                            @if(auth()->user()->hasRole('teacher'))
                                                <td>{{ $post['targete_user'] ?? '' }}</td>
                                            @endif
                                            <td>
                                                @if(auth()->user()->hasRole('admin'))
                                                    <a href="{{ route('admin.post.edit', $post['id']) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin.post.delete', $post['id']) }}" class="btn btn-sm btn-danger delete-btn" data-url="{{ route('admin.post.delete', $post['id']) }}"><i class="fas fa-trash"></i></a>
                                                @endif
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
                        if (confirm('Are you sure you want to delete this post?')) {
                            window.location.href = url;
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
