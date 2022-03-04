<script>
    $('body').keypress(function (e) {
        if (e.keyCode == 13) {
            $('#search').submit();
        }
    });

    function upperCaseF(a) {
        setTimeout(function () {
            a.value = a.value.toUpperCase();
        }, 1);
    }

</script>

<div class="offcanvas offcanvas-end" tabindex="-1" id="add-order" aria-labelledby="offcanvasEndLabel">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title" id="offcanvasEndLabel">Create Order</h2>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="/admin/order/{{ $dataproducts->slug }}/process" method="POST" autocomplete="off">
            {{ csrf_field() }}
            <div>
                <div class="mb-3">
                    <label class="form-label">Product Code</label>
                    <input name="product_sku" onkeydown="upperCaseF(this)" type="text" class="form-control" placeholder="Ex : ML86" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Account Info</label>
                    <input name="customer_no" type="text" class="form-control" placeholder="@if($dataproducts->name == 'ML')User ID + Server ID (22809xxxx2254) 
                    @elseif ($dataproducts->name == 'FF')Player ID 
                    @elseif ($dataproducts->name == 'LOLWR')ID Riot + Tag (Bisquit#SEA) 
                    @elseif ($dataproducts->name == 'VLRNT')Account Username 
                    @elseif ($dataproducts->name == 'PB')User ID
                    @elseif ($dataproducts->name == 'GI')Server ID + UID
                    @elseif ($dataproducts->name == 'PUBGM')User ID
                    @elseif ($dataproducts->name == 'CODM')User ID @endif" required>
                </div>
            </div>
            <div class="mt-3">
                <button class="btn btn-outline-success" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <line x1="9" y1="12" x2="15" y2="12"></line>
                        <line x1="12" y1="9" x2="12" y2="15"></line>
                    </svg>
                    Process Order
                </button>
            </div>
        </form>
    </div>
</div>
