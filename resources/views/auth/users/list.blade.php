<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col" onclick="sort('id')"><a href="#" class="pe-auto" style="text-decoration: none">#</a></th>
            <th scope="col" onclick="sort('name')"><a href="#" class="pe-auto" style="text-decoration: none">{{_('Name')}}</a></th>
            <th scope="col" onclick="sort('email')"><a href="#" class="pe-auto" style="text-decoration: none">{{_('Email')}}</a></th>
            <th> </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row" onclick="showUser({{$user->id}})"><a href="#" class="pe-auto text-light" style="text-decoration: none">{{$user->id}}</a></th>
                <td scope="row" onclick="showUser({{$user->id}})"><a href="#" class="pe-auto text-light" style="text-decoration: none">{{$user->name}}</a></td>
                <td scope="row" onclick="showUser({{$user->id}})"><a href="#" class="pe-auto text-light" style="text-decoration: none">{{$user->email}}</a></td>
                <td><button onclick="deleteUser({{$user->id}})" class="btn btn-danger" >{{_('Delete')}}</button></td>
            </tr>
        @endforeach
    </tbody>
</table>
<form id="form-id" method="POST" action="/users">
    @csrf
    @method('DELETE')
</form>
{{ $users->links() }}
<script>
    function sort(arg) 
    {
        document.location.href="/users/list?order=" + arg;
    }

    function showUser(id)
    {
        document.location.href="/users/" + id;
    }

    function deleteUser(id)
    {
        if (confirm('Are you sure you want to delete this user?')) {
            document.getElementById('form-id').action = '/users/' + id;
            document.getElementById('form-id').submit();
        }
    }
</script>
