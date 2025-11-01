<x-app-layout>
@section('title',"Edit User")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit User') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('teacher.user.update', $user->id) }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email"> 
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select select2 @error('role') is-invalid @enderror" id="role" name="role" style="width: 100%;">
                                        <option value="student" @if($user->role == 'student') selected @endif>Student</option>
                                        <option value="parent" @if($user->role == 'parent') selected @endif>Parent</option>                                    
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select select2 @error('status') is-invalid @enderror" id="status" name="status" style="width: 100%;">
                                        <option value="active" @if($user->status == 'active') selected @endif>Active</option>
                                        <option value="pending" @if($user->status == 'pending') selected @endif>Pending</option>
                                        <option value="inactive" @if($user->status == 'inactive') selected @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="hidden" name="id" value="{{ $user->id }}" />
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                    <a href="{{ route('teacher.dashboard') }}"><button type="submit" class="btn btn-primary">{{ __('Back') }}</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
