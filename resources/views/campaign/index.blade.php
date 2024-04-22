<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            All Campaign
        </x-slot>
        <x-slot name="body">
            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Body</th>
                            <th>Attachment</th>
                            <th>Campaign Type</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campaigns as $campaign)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $campaign->title }}</td>
                                <td>{{ $campaign->description }}</td>
                                <td>{{ $campaign->body }}</td>
                                <td>{{ $campaign->attachment }}</td>
                                <td>{{ $campaign->campagin_type }}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ route('campaign.edit', $campaign->id) }}"
                                                    class="dropdown-item"
                                                    ><i class="icon-pencil7"></i> Edit
                                                    Campaign</a>
                                                <form style="display:inline"
                                                    action="{{ route('campaign.destroy', $campaign->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this campaign?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item" title="Delete expense">
                                                        <i class="icon-trash-alt"></i>Delete
                                                    </button>
                                                </form>
                                                {{-- <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
												<a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('campaign.create') }}"
                class="btn 
            btn-sm 
            bg-success 
            border-2 
            border-success
            btn-icon 
            rounded-round 
            legitRipple 
            shadow 
            mr-1"
                data-toggle="modal" data-target="#createCampaign"><i class="icon-plus2"></i></a>
        </x-slot>
    </x-data-display.card>
    @include('campaign.create-modal')
</x-layouts.master>
