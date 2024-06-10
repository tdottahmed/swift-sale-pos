<div class="card mt-1">
    <div class="d-flex justify-between align-items-center card-body">
        <div class="buttons">
            <a href="{{route('pos.index')}}" class="btn btn-sm bg-blue-800 mr-2"><i class="icon icon-list2 mr-2"></i>Pos List</a>
            <button class="btn btn-sm bg-indigo-800 mx-2" data-toggle="modal" data-target="#createExpense"><i
                    class="icon icon-plus2 mr-2"></i>Expense</button>
            <button class="btn btn-sm bg-indigo-800 mx-2" data-toggle="modal" data-target="#createRepair"><i
                    class="icon icon-plus2 mr-2"></i>Repair</button>
            <a href="{{route('returned.list')}}" class="btn btn-sm bg-danger-800 mx-2"><i class="icon icon-reset mr-2"></i>Return</a>
            <a href="{{route('suspended.list')}}" class="btn btn-sm bg-info-800 mx-2"><i class="icon icon-pause mr-2"></i>suspended</a>
            <x-pos.recent-sales/>
        </div>
        <div class="clock-items ml-auto">                
            <x-clock/>                  
        </div>
    </div>
</div>