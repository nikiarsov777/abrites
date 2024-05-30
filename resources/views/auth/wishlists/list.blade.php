<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col" onclick="sort('id')"><a href="#" class="pe-auto" style="text-decoration: none">#</a></th>
            <th scope="col" onclick="sort('name')"><a href="#" class="pe-auto" style="text-decoration: none">{{_('Name')}}</a></th>
            <th scope="col" onclick="sort('description')"><a href="#" class="pe-auto" style="text-decoration: none">{{_('Description')}}</a></th>
            <th scope="col" onclick="sort('language')"><a href="#" class="pe-auto" style="text-decoration: none">{{_('Language')}}</a></th>
            <th scope="col" onclick="sort('platform')"><a href="#" class="pe-auto" style="text-decoration: none">{{_('Platform')}}</a></th>
            <th> </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($wishlists as $wishlist)
            <tr>
                <th scope="row" onclick="showWish({{$wishlist->id}})"><a href="#" class="pe-auto text-light" style="text-decoration: none">{{$wishlist->id}}</a></th>
                <td scope="row" onclick="showWish({{$wishlist->id}})"><a href="#" class="pe-auto text-light" style="text-decoration: none">{{urldecode($wishlist->name)}}</a></td>
                <td scope="row" onclick="showWish({{$wishlist->id}})"><a href="#" class="pe-auto text-light" style="text-decoration: none">{{$wishlist->description}}</a></td>
                <td scope="row" onclick="showWish({{$wishlist->id}})"><a href="#" class="pe-auto text-light" style="text-decoration: none">{{$wishlist->language}}</a></td>
                <td scope="row" onclick="showWish({{$wishlist->id}})"><a href="#" class="pe-auto text-light" style="text-decoration: none">{{$wishlist->platform}}</a></td>
                <td><button onclick="deleteUser({{$wishlist->id}})" class="btn btn-danger" >{{_('Delete')}}</button></td>
            </tr>
        @endforeach
    </tbody>
</table>
<form id="form-id" method="POST" action="/">
    @csrf
    @method('DELETE')
</form>
{{ $wishlists->links() }}
<script>
    function sort(arg) 
    {
        document.location.href="/wishlists?order=" + arg;
    }

    function showWish(id)
    {
        document.location.href="/wishlists/" + id;
    }

    function deleteUser(id)
    {
        if (confirm('Are you sure you want to delete this wish?')) {
            document.getElementById('form-id').action = '/wishlists/' + id;
            document.getElementById('form-id').submit();
        }
    }
</script>
