@section('page')
    <div class="card">
        <div class="card-header">Catalog</div>
        <div class="card-body">
            <table class="table table-striped table-dark" id="tableCatalog">
                <thead>
                    <tr>
                        <th scope="col" onclick="sort('id')"><a href="#" class="pe-auto"
                                style="text-decoration: none">#</a></th>
                        <th scope="col" onclick="sort('language')"><a href="#" class="pe-auto"
                                style="text-decoration: none">{{ _('Language') }}</a></th>
                        <th scope="col" onclick="sort('name')"><a href="#" class="pe-auto"
                                style="text-decoration: none">{{ _('Name') }}</a></th>
                        <th scope="col" onclick="sort('description')"><a href="#" class="pe-auto"
                                style="text-decoration: none">{{ _('Description') }}</a></th>
                        <th scope="col">{{ _('Platform') }}</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <form id="form-id" method="POST" action="/users">
        @csrf
    </form>
    <script>
        function sort(arg) {
            document.location.href = "/catalog?order=" + arg;
        }

        function load() {
            $("#tableCatalog > tbody:first").append('<tr><td colspan="5">Loading ...</td></tr>');
            $.get("/catalog?q=php&sort=latest_release_published_at&per_page=10", function(data, status) {
                var rows = '';
                var i = 1;
                $.each(data, function() {
                    rows += '<tr>';
                    rows += '<td>';
                    rows += i;
                    rows += '</td>';
                    rows += '<td>';
                    rows += this.language;
                    rows += '</td>';
                    rows += '<td>';
                    rows += this.name;
                    rows += '</td>';
                    rows += '<td>';
                    rows += this.description;
                    rows += '</td>';
                    rows += '<td>';
                    rows += this.platform;
                    rows += '</td>';
                    rows += '</tr>';
                    i++;
                });
                $("#tableCatalog tr").last().remove();
                $("#tableCatalog > tbody:first").append(rows);
            });
        }

        $(document).ready(function() {
            load();
        });
    </script>
@endsection
