<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Public list with search and filters
    public function index(Request $request)
    {
        $query = JobListing::query()->latest();

        if ($request->filled('q')) {
            $term = $request->q;
            $query->where(function ($q) use ($term) {
                $q->where('title', 'like', "%{$term}%")
                  ->orWhere('company', 'like', "%{$term}%");
            });
        }
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }
        if ($request->filled('job_type')) {
            $query->where('job_type', $request->job_type);
        }

        $jobs = $query->paginate(9)->withQueryString();

        return view('jobs.index', ['jobs' => $jobs, 'types' => JobListing::TYPES]);
    }

    public function show(JobListing $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        return view('jobs.create', ['types' => JobListing::TYPES]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $request->user()->jobListings()->create($data);

        return redirect()->route('jobs.index')->with('success', 'Job posted successfully.');
    }

    public function edit(Request $request, JobListing $job)
    {
        $this->authorizeOwner($request, $job);
        return view('jobs.edit', ['job' => $job, 'types' => JobListing::TYPES]);
    }

    public function update(Request $request, JobListing $job)
    {
        $this->authorizeOwner($request, $job);
        $job->update($this->validated($request));

        return redirect()->route('jobs.show', $job)->with('success', 'Job updated successfully.');
    }

    public function destroy(Request $request, JobListing $job)
    {
        $this->authorizeOwner($request, $job);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:150',
            'company' => 'required|string|max:150',
            'location' => 'required|string|max:100',
            'job_type' => 'required|in:' . implode(',', JobListing::TYPES),
            'salary' => 'nullable|string|max:100',
            'description' => 'required|string|min:20',
        ]);
    }

    // Only the user who posted the job can change or delete it
    private function authorizeOwner(Request $request, JobListing $job): void
    {
        abort_unless($job->user_id === $request->user()->id, 403, 'You can only manage your own job posts.');
    }
}
