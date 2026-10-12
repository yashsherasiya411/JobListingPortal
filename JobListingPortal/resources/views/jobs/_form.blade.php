@php
    $fields = ['title' => 'Job Title', 'company' => 'Company', 'location' => 'Location', 'salary' => 'Salary (optional)'];
@endphp

@foreach ($fields as $name => $label)
    <div class="mb-3">
        <label class="form-label" for="{{ $name }}">{{ $label }}</label>
        <input type="text" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $job->$name) }}"
               class="form-control @error($name) is-invalid @enderror">
        @error($name) <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
@endforeach

<div class="mb-3">
    <label class="form-label" for="job_type">Job Type</label>
    <select id="job_type" name="job_type" class="form-select @error('job_type') is-invalid @enderror">
        <option value="">Select type</option>
        @foreach ($types as $type)
            <option value="{{ $type }}" @selected(old('job_type', $job->job_type) === $type)>{{ $type }}</option>
        @endforeach
    </select>
    @error('job_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="description">Description</label>
    <textarea id="description" name="description" rows="6"
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $job->description) }}</textarea>
    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
