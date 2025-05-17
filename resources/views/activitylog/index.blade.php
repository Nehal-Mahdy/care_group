<x-app-layout>
    @section('title', 'Activity Logs')

    <div class="content-wrapper mx-auto">

        <!-- Main content -->
        <section class="content">
            <div class="card overflow-auto">
                <div class="card-header">
                    <h3 class="card-title">Activity Logs</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Combined card-body -->
                <div class="card-body">
                    <!-- Filters Form -->
                    <form action="{{ route('activity-log.index') }}" method="GET">
    <div class="row mb-4">
        <!-- Date Filter From -->
        <div class="col-md-2">
            <input type="date" name="date_from" class="form-control" placeholder="Start Date" value="{{ request('date_from') }}">
        </div>

        <!-- Date Filter To -->
        <div class="col-md-2">
            <input type="date" name="date_to" class="form-control" placeholder="End Date" value="{{ request('date_to') }}">
        </div>

        <!-- Log Name Filter -->
        <div class="col-md-2">
            <input type="text" name="log_name" class="form-control" placeholder="Log Name" value="{{ request('log_name') }}">
        </div>

        <!-- Search Filter -->
        <div class="col-md-2">
            <input type="text" name="search" class="form-control" placeholder="Des..." value="{{ request('search') }}">
        </div>

        <!-- Filter Button -->
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-block">Filter</button>
        </div>

        <!-- Reset Filters Button -->
        <div class="col-md-2">
            <a href="{{ route('activity-log.index') }}" class="btn btn-secondary btn-block">Reset</a>
        </div>
    </div>
</form>


                    <!-- Table to Display Logs -->
                    <table class="table table-striped projects" id="indexTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Log Name</th>
                                <th>Description</th>
                                <th>Causer ID</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activities as $activity)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <!-- Log Name with Link -->

                                <td>
    <a href="{{ $activity->log_name }}" class="btn btn-link">{{ $activity->log_name }}</a>
</td>

                                <td>{{ $activity->description }}</td>
                                <td>{{ $activity->causer_id }}</td>
                                <td>{{ $activity->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

        </section>
    </div>
</x-app-layout>
