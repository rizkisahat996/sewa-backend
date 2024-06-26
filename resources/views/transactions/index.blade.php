@extends('layouts.vertical', ['title' => 'Index', 'sub_title' => 'Transactions', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
                                            Building</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Renter
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Start
                                            Date
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">End Date
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Total
                                            Amount
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($transactions as $item)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                {{ $item->id }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $item->building->description }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $item->renter->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                {{ $item->start_date }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                {{ $item->end_date }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                {{ $item->total_amount }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <a class="text-primary hover:text-sky-700"
                                                    href="{{ route('transactions.show', ['transaction' => $item->id]) }}">Show</a>
                                                <a class="text-primary hover:text-sky-700"
                                                    href="{{ route('transactions.edit', ['transaction' => $item->id]) }}">Edit</a>
                                                <form action="{{ route('transactions.destroy', ['transaction' => $item->id]) }}"
                                                    method="POST">
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
@endsection
