<div class="row g-0">

    <div class="col-md-6 col-lg-5 d-flex align-items-center">
        <div class="card-body p-4 p-lg-3 text-black">

            <form method="POST" action="/wishlists/{{@$wishlist->id}}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="form" value="wishlist_update" />
                <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ffffff;"></i>
                    <span class="h5 fw-bold mb-0" style="color: #ffffff;">{{ _('Wishlist Information') }}</span>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <input type="text" id="name" name="name"
                        class="form-control form-control-lg" value="{{@$wishlist->name}}" />
                    <label class="form-label" for="name">{{ _('Name') }}</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                    <input type="text" id="description" name="description"
                        class="form-control form-control-lg" value="{{@$wishlist->description}}"/>
                    <label class="form-label" for="description">{{ _('Description') }}</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    @if ($errors->has('language'))
                        <span class="text-danger">{{ $errors->first('language') }}</span>
                    @endif
                    <input type="text" id="password" name="language"
                        class="form-control form-control-lg" value="{{@$wishlist->language}}"/>
                    <label class="form-label" for="language">{{ _('Language') }}</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    @if ($errors->has('platform'))
                        <span class="text-danger">{{ $errors->first('platform') }}</span>
                    @endif
                    <input type="text" id="platform" name="platform"
                        class="form-control form-control-lg" value="{{@$wishlist->platform}}"/>
                    <label class="form-label"
                        for="platform">{{ _('Platform') }}</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    @if ($errors->has('latest_release_number'))
                        <span class="text-danger">{{ $errors->first('latest_release_number') }}</span>
                    @endif
                    <input type="text" id="latest_release_number" name="latest_release_number"
                        class="form-control form-control-lg" value="{{@$wishlist->latest_release_number}}"/>
                    <label class="form-label"
                        for="latest_release_number">{{ _('Latest release number') }}</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    @if ($errors->has('latest_download_url'))
                        <span class="text-danger">{{ $errors->first('latest_download_url') }}</span>
                    @endif
                    <input type="text" id="latest_download_url" name="latest_download_url"
                        class="form-control form-control-lg" value="{{@$wishlist->latest_download_url}}"/>
                    <label class="form-label"
                        for="latest_download_url">{{ _('Latest download url') }}</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    @if ($errors->has('latest_release_published_at'))
                        <span class="text-danger">{{ $errors->first('latest_release_published_at') }}</span>
                    @endif
                    <input type="text" id="latest_release_published_at" name="latest_release_published_at"
                        class="form-control form-control-lg" value="{{@$wishlist->latest_release_published_at}}"/>
                    <label class="form-label"
                        for="latest_release_published_at">{{ _('Latest release published') }}</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    @if ($errors->has('rank'))
                        <span class="text-danger">{{ $errors->first('rank') }}</span>
                    @endif
                    <input type="text" id="rank" name="rank"
                        class="form-control form-control-lg" value="{{@$wishlist->rank}}"/>
                    <label class="form-label"
                        for="rank">{{ _('Rank') }}</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    @if ($errors->has('stars'))
                        <span class="text-danger">{{ $errors->first('stars') }}</span>
                    @endif
                    <input type="text" id="rank" name="stars"
                        class="form-control form-control-lg" value="{{@$wishlist->stars}}"/>
                    <label class="form-label"
                        for="stars">{{ _('Stars') }}</label>
                </div>

            </form>

        </div>
    </div>
</div>
