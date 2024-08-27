<x-layouts.master>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Profit or loss</h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
                <li class="nav-item"><a href="#profitByProduct" class="nav-link active" data-toggle="tab">Profit By
                        Product</a></li>
                <li class="nav-item"><a href="#profitByCategories" class="nav-link" data-toggle="tab">Profif By
                        Category</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade active show" id="profitByProduct">
                    Profit By Product
                </div>
                <div class="tab-pane fade" id="profitByCategories">
                    Profit By Category
                </div>
            </div>
        </div>
    </div>
</x-layouts.master>
