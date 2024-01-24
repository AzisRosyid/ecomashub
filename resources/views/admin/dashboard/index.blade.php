@extends('layouts.app')

@section('content')
    <div class="py-8 bg-gray-50 justify-start items-start w-full border-l">
        <div class="flex mx-10 justify-between border-b pb-4">
            <div>
                <p class="text-zinc-700 text-[28px] font-semibold font-['Fredoka'] leading-9">Dashboard</p>
                <p class="text-slate-500 text-sm font-normal font-fredokaRegular leading-tight">Manage your team
                    members and their account permissions here</p>
            </div>
            <div class="justify-end">
                <form action="post">
                    <button
                        class="px-4 py-2.5 rounded-lg border border-gray-400 text-gray-400 text-sm font-normal font-fredokaRegular items-center">secondary</button>
                    <button
                        class="px-4 py-2.5 rounded-lg border border-lime-600 bg-lime-600 text-white text-sm font-normal font-fredokaRegular items-center">primary</button>
                    <input type="text" class="p-2 bg-white rounded-md border border-gray-400" placeholder="search">
                </form>
            </div>
        </div>
    </div>
@endsection
