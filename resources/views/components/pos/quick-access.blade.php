
<div class="fixed-top quick-access pt-2 mx-4" >
    <div class="row">
        <div class="col-lg-8">
            <a href="{{route('pos.index')}}" class="btn btn-sm bg-blue-800 mr-2"><i class="icon icon-list2 mr-2"></i>Pos List</a>
            <button class="btn btn-sm bg-indigo-800 mx-2" data-toggle="modal" data-target="#createExpense"><i
                    class="icon icon-plus2 mr-2"></i>Expense</button>
            <button class="btn btn-sm bg-indigo-800 mx-2" data-toggle="modal" data-target="#createRepair"><i
                    class="icon icon-plus2 mr-2"></i>Repair</button>
            <a href="{{route('returned.list')}}" class="btn btn-sm bg-danger-800 mx-2"><i class="icon icon-reset mr-2"></i>Return</a>
            <a href="{{route('suspended.list')}}" class="btn btn-sm bg-info-800 mx-2"><i class="icon icon-pause mr-2"></i>suspended</a>
            <x-pos.recent-sales/>
        </div>
        <div class="col-lg-4">
            <p>Current Location <span class="btn btn-sm bg-indigo">{{auth()->user()->branch->name}}</span></p>
        </div>
    </div>
</div>