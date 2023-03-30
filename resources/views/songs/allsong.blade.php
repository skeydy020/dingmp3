<div class="row isotope-grid" >
    @foreach($songs as $key => $song)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="{{ $song->thumb }}" alt="{{ $song->name }}">
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/bai-hat/{{ $song->id }}-{{ Str::slug($song->name, '-') }}.html"
                           class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            {{ $song->name }}
                        </a>

                        <p>
                            {{ $song->singer->name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

