<div class="mt-3 mb-3">
    <div class="row table-row">
        @for($i = 0; $i < 5; $i++)
            <div class="table-wrapper">
                <div class="row">
                    <div class="col-sm-6"><div class="seat" id="seat{{ $i * 4 + 1 }}"><p>{{ $i * 4 + 1 }}</p></div></div>
                    <div class="col-sm-6"><div class="seat" id="seat{{ $i * 4 + 2 }}"><p>{{ $i * 4 + 2 }}</p></div></div>
                </div>
                <div class="col-md-12 seatmap-table"></div>
                <div class="row">
                    <div class="col-sm-6"><div class="seat" id="seat{{ $i * 4 + 3 }}"><p>{{ $i * 4 + 3 }}</p></div></div>
                    <div class="col-sm-6"><div class="seat" id="seat{{ $i * 4 + 4 }}"><p>{{ $i * 4 + 4 }}</p></div></div>
                </div>
            </div>
        @endfor
    </div>
</div>