<div class="row isotope-grid" >
    @foreach($lists as $key => $list)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="{{ $list->thumb }}" alt="{{ $list->name }}">
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/list/{{ $list->id }}-{{ Str::slug($list->name, '-') }}.html"
                           class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            {{ $list->name }}
                        </a>

                        
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

