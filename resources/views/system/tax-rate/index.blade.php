@extends('avored::layouts.app')

@section('meta_title')
    {{ __('avored::system.tax-rate.index.title') }}: AvoRed E commerce Admin Dashboard
@endsection

@section('page_title')
    {{ __('avored::system.tax-rate.index.title') }}
@endsection

@section('content')
<a-row type="flex" class="mb-1" justify="end">
    <a-col>
        <a 
            href="{{ route('admin.tax-rate.create') }}"
            class="ant-btn ant-btn-primary">
            <a-icon type="plus"></a-icon>
            {{ __('avored::system.btn.create') }}
        </a>
    </a-col>
</a-row>
<a-row type="flex" justify="center">
    <a-col :span="24">        
        <tax-rate-table :tax-rates="{{ $taxRates }}" inline-template base-url="{{ asset(config('avored.admin_url')) }}">
            <a-table @change="handleTableChange" :columns="columns" row-key="id" :data-source="taxRates">
                <span slot="action" slot-scope="text, record">
                    
                    <a :href="getEditUrl(record)">
                        <a-icon type="edit"></a-icon>
                    </a>
                    <a :href="getDeleteUrl(record)" v-on:click.prevent="deleteTaxRate(record)">
                        <a-icon type="delete"></a-icon>
                    </a>
                </span>
            </a-table>
        </tax-rate-table>
    </a-col>
</a-row>
@endsection
