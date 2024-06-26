@extends('layouts.vertical', ['title' => 'Index', 'sub_title' => 'Building', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/gridjs/dist/theme/mermaid.min.css'])
@endsection

@section('content')
    <div class="grid lg:grid-cols-1 grid-cols-1 gap-6">
        <div class="card">
            <div>
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Description</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rent
                                            Price / 24 h
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Owner
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($buildings as $item)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                {{ $item->id }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $item->description }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $item->rent_price }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                {{ $item->owner->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <a class="text-primary hover:text-sky-700"
                                                    href="{{ route('buildings.show', ['building' => $item->id]) }}">Show</a>
                                                <a class="text-primary hover:text-sky-700"
                                                    href="{{ route('buildings.edit', ['building' => $item->id]) }}">Edit</a>
                                                <form action="{{ route('buildings.destroy', ['building' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="text-primary hover:text-sky-700">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="ExampleTableHtml" class="hidden w-full overflow-hidden transition-[height] duration-300">
                    <div class="p-6">
                        <pre class="language-html h-56">
                                <code>
                                    &lt;div class=&quot;overflow-x-auto&quot;&gt;
                                        &lt;div class=&quot;min-w-full inline-block align-middle&quot;&gt;
                                            &lt;div class=&quot;overflow-hidden&quot;&gt;
                                                &lt;table class=&quot;min-w-full divide-y divide-gray-200 dark:divide-gray-700&quot;&gt;
                                                    &lt;thead&gt;
                                                        &lt;tr&gt;
                                                            &lt;th scope=&quot;col&quot; class=&quot;px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase&quot;&gt;Name&lt;/th&gt;
                                                            &lt;th scope=&quot;col&quot; class=&quot;px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase&quot;&gt;Age&lt;/th&gt;
                                                            &lt;th scope=&quot;col&quot; class=&quot;px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase&quot;&gt;Address&lt;/th&gt;
                                                            &lt;th scope=&quot;col&quot; class=&quot;px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase&quot;&gt;Action&lt;/th&gt;
                                                        &lt;/tr&gt;
                                                    &lt;/thead&gt;
                                                    &lt;tbody class=&quot;divide-y divide-gray-200 dark:divide-gray-700&quot;&gt;
                                                        &lt;tr&gt;
                                                            &lt;td class=&quot;px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200&quot;&gt;John Brown&lt;/td&gt;
                                                            &lt;td class=&quot;px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200&quot;&gt;45&lt;/td&gt;
                                                            &lt;td class=&quot;px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200&quot;&gt;New York No. 1 Lake Park&lt;/td&gt;
                                                            &lt;td class=&quot;px-6 py-4 whitespace-nowrap text-end text-sm font-medium&quot;&gt;
                                                                &lt;a class=&quot;text-primary hover:text-sky-700&quot; href=&quot;#&quot;&gt;Delete&lt;/a&gt;
                                                            &lt;/td&gt;
                                                        &lt;/tr&gt;

                                                        &lt;tr&gt;
                                                            &lt;td class=&quot;px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200&quot;&gt;Jim Green&lt;/td&gt;
                                                            &lt;td class=&quot;px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200&quot;&gt;27&lt;/td&gt;
                                                            &lt;td class=&quot;px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200&quot;&gt;London No. 1 Lake Park&lt;/td&gt;
                                                            &lt;td class=&quot;px-6 py-4 whitespace-nowrap text-end text-sm font-medium&quot;&gt;
                                                                &lt;a class=&quot;text-primary hover:text-sky-700&quot; href=&quot;#&quot;&gt;Delete&lt;/a&gt;
                                                            &lt;/td&gt;
                                                        &lt;/tr&gt;

                                                        &lt;tr&gt;
                                                            &lt;td class=&quot;px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200&quot;&gt;Joe Black&lt;/td&gt;
                                                            &lt;td class=&quot;px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200&quot;&gt;31&lt;/td&gt;
                                                            &lt;td class=&quot;px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200&quot;&gt;Sidney No. 1 Lake Park&lt;/td&gt;
                                                            &lt;td class=&quot;px-6 py-4 whitespace-nowrap text-end text-sm font-medium&quot;&gt;
                                                                &lt;a class=&quot;text-primary hover:text-sky-700&quot; href=&quot;#&quot;&gt;Delete&lt;/a&gt;
                                                            &lt;/td&gt;
                                                        &lt;/tr&gt;
                                                    &lt;/tbody&gt;
                                                &lt;/table&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                </code>
                            </pre>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->

    </div>
    {{-- <div class="flex flex-col gap-6">
        <div class="card">
            <div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title">Buildings</h4>
                </div>
                <div class="flex justify-between items-center ms-5 mt-5">
                    <div class="flex items-center gap-2">
                        <button type="button" class="btn-code" data-fc-type="collapse" data-fc-target="defaultButtonsHtml">
                            <i class="mgc_eye_line text-lg"></i>
                            <a href="/buildings/create" class="ms-2">Create Building</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div id="table-gridjs" data-type="building" data-buildings="{{ json_encode($buildings) }}"></div>
            </div>
        </div>
    </div> --}}
@endsection

@section('script')
    @vite(['resources/js/pages/table-grid.js'])
@endsection
