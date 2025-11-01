<x-app-layout>
    @section('title',"Add Announcement")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Announcement') }}</div>

                    <div class="card-body">
                        @if(auth()->user()->hasRole('admin'))
                            <form method="POST" action="{{ route('admin.post.create') }}">
                        @else 
                            <form method="POST" action="{{ route('teacher.post.create') }}">
                        @endif        
                            @csrf

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"  autocomplete="title" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" >{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @if(auth()->user()->hasRole('teacher'))
                                <div class="row mb-3">
                                    <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Announcement Target To') }}</label>

                                    <div class="col-md-6">
                                    <select class="form-select select2 @error('targete_user') is-invalid @enderror" id="targete_user" name="targete_user" style="width: 100%;">
                                        <option value="student,parent" @if(old('targete_user') == 'student,parent') selected @endif>Student And Parent</option>   
                                        <option value="student" @if(old('targete_user') == 'student') selected @endif>Only Student</option>
                                        <option value="parent" @if(old('targete_user') == 'parent') selected @endif>Only Parent</option>                                    
                                    </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif    
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Announcement') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
