@if($entry->status->name == 'Started')
    <form action="{{ route('admin.task.status.markAsFinished', ['task' => $entry->getKey()])}}" method="POST">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <input type="submit" value="Mark as finished" class="btn btn-xs btn-warning" style="">
    </form>
@endif
