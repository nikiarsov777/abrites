@section('page')
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <div class="card">
        <div class="card-header">Catalog</div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-3">
                        <label for="search" style="color:blue">{{ _('Search for') }}</label>
                        <input type="text" id="search" name="search" />
                    </div>
                    <div class="col col-lg-2">
                        <input type="button" id="submit" name="submit" value="{{ _('Search') }}"
                            onclick="search()" />
                    </div>
                </div>
            </div>
            <table class="table table-striped table-dark" id="tableCatalog">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ _('Language') }}</th>
                        <th scope="col">{{ _('Name') }}</th>
                        <th scope="col">{{ _('Description') }}</th>
                        <th scope="col">{{ _('Platform') }}</th>
                        <th scope="col" onclick="sort('latest_release_published_at')"><a href="#" class="pe-auto"
                                style="text-decoration: none">{{ _('Latest published') }}</a>
                        </th>
                        <th scope="col" onclick="sort('rank')"><a href="#" class="pe-auto"
                                style="text-decoration: none">{{ _('Rank') }}</a>
                        </th>
                        <th scope="col" onclick="sort('stars')"><a href="#" class="pe-auto"
                                style="text-decoration: none">{{ _('Stars') }}</a>
                        </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <input type="hidden" id="keyword" value="php" />
        <div class="container">
            <div class="row">
                <div class="col col-lg-3">
                    <input type="hidden" id="page" value="1" />
                    <input type="button" value="{{ _('Prev') }}" onclick="gotoPage('prev')" />
                </div>
                <div class="col col-lg-2">
                    <input type="button" value="{{ _('Next') }}" onclick="gotoPage('next')" />
                </div>
            </div>
        </div>
    </div>

    <script>
        function sort(arg) {
            load(q = 'php', 1, sort = arg);
        }

        function load(q = 'php', page = 1, sort = 'latest_release_published_at') {
            $("#tableCatalog").find("tr:gt(0)").remove();
            $("#tableCatalog > tbody:first").append('<tr><td colspan="5">Loading ...</td></tr>');
            var query = "/catalog?q=" + q + "&sort=" + sort + "&per_page=10&languages=php&page=" + page;
            $.get(query, function(data, status) {
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
                    rows += this.name + ' - ' + this.latest_release_number;
                    rows += '</td>';
                    rows += '<td>';
                    rows += this.description;
                    rows += '</td>';
                    rows += '<td>';
                    rows += this.platform;
                    rows += '</td>';
                    rows += '<td>';
                    rows += this.latest_release_published_at;
                    rows += '</td>';
                    rows += '<td>';
                    rows += this.rank;
                    rows += '</td>';
                    rows += '<td>';
                    rows += this.stars;
                    var myObj = {};
                    myObj['name'] = encodeURIComponent($.trim(this.name));
                    myObj['description'] = this.description;
                    myObj['language'] = this.language;
                    myObj['platform'] = this.platform;
                    myObj['latest_release_number'] = this.latest_release_number;
                    myObj['latest_download_url'] = this.latest_download_url;
                    myObj['latest_release_published_at'] = this.latest_release_published_at;
                    myObj['rank'] = this.rank;
                    myObj['stars'] = this.stars;
                    var json = JSON.stringify(myObj);
                    rows += '<input type="hidden" id="row_' + i + '" value=\'' + json + '\'>';
                    rows += '</td>';
                    rows += '<td>';
                    rows += '<span id="but_' + i + '"><input type="button" value="Add" onclick="addWish(' +
                        i + ')" /></span>';
                    rows += '</td>';
                    rows += '</tr>';
                    i++;
                });
                $("#tableCatalog tr").last().remove();
                $("#tableCatalog > tbody:first").append(rows);
            });
        }

        function gotoPage(arg) {
            var gotoPage = $('#page').val();
            if (arg == 'prev') {
                if (gotoPage > 1) {
                    gotoPage--;
                } else {
                    alert('No more pages!');
                    return;
                }
            }

            if (arg == 'next') {
                if (gotoPage >= 1) {
                    gotoPage++;
                } else {
                    alert('No more pages!');
                    return;
                }
            }

            $('#page').val(gotoPage);
            var keyword = $('#keyword').val();
            load(q = keyword, gotoPage);
        }

        function search() {
            var keyword = encodeURIComponent($.trim($('#search').val()));
            $('#keyword').val(keyword);
            load(q = keyword);
        }

        function addWish(num) {
            var numWish = 1 * ($('#wishlist_num').text()) + 1;
            $('#wishlist_num').text(numWish);

            saveWish($('#row_' + num).val(), num);
        }

        function saveWish(data, num) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('#token').val()
                }
            });
            $.post("/users/wishlist", JSON.parse(data))
            .done(function() {
                    alert("Wish added!");
                    $('#but_' + num).empty()
                })
                .fail(function() {
                    alert("error");
                });
        }

        $(document).ready(function() {
            load();
        });
    </script>
@endsection
