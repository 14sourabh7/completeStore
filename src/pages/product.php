<!-- main body -->
<div class="container-fluid">

    <div class="row">
        <div class="col">
            <span class="col btn filter">All</span>
            <span class="col btn filter">faishion</span>
            <span class="col btn filter">electronics</span>
            <span class="col btn filter">appliances</span>
            <span class="col btn filter">furniture</span>
            </select>

        </div>
        <div class="col">
            <div class="col">
                <label class="visually-hidden" for="inlineFormSelectPref">Sort By</label>
                <select class="form-select sort" id="inlineFormSelectPref">
                    <option selected>Sort By</option>
                    <option value="priceDown">Price low to high</option>
                    <option value="priceUp">Price high to low</option>
                    <!-- <option value="2">Recently Added</option>
                    <option value="3">Popularity</option> -->
                </select>
            </div>
        </div>
        <div class="col-12 mx-auto">

            <div class=" row" id='productsDisplay'>
            </div>
            <div id="pagination"></div>
        </div>
    </div>
</div>