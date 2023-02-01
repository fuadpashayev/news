
import { useEffect, useReducer } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import Select from 'react-select';
import ReactDatePicker from 'react-datepicker';
import useDebounce from 'hooks/useDebounce';
import { setFilters } from 'state/modules/news/filterSlice';
import { comparable, formatDate } from 'utils';

import "react-datepicker/dist/react-datepicker.css";
import './Filters.css';

const filtersReducer = (state, action) => ({ ...state, ...action });

const initialState = {
    startDate: '',
    endDate: '',
    category: '',
    keyword: '',
    language: '',
};

const Filters = () => {
    const dispatch = useDispatch();
    const [filters, filterDispatch] = useReducer(filtersReducer, initialState);
    const { categories, languages } = useSelector(state => state.filterItems);
    const debounce = useDebounce(750);

    useEffect(() => {
        debounce(() => {
            const data = { ...filters };
            data.startDate = formatDate(filters.startDate);
            data.endDate = formatDate(filters.endDate);
            dispatch(setFilters(data));
        });
    }, [comparable(filters)]);

    return (
        <div className="row filters-container">
            <div className="col-md-2 col-sm-6 mb-sm-1 mb-1">
                <div className="search">
                    <input onChange={e => filterDispatch({ keyword: e.target.value })} className='search-input' type="text" placeholder="Keyword" />
                </div>
            </div>
            <div className="col-md-3 col-sm-6 mb-sm-1 mb-1">
                <div className="category">
                    <Select onChange={({ value }) => filterDispatch({ category: value })} options={categories} placeholder='Category' />
                </div>
            </div>
            <div className="col-md-3 col-sm-4 mb-sm-1 mb-1">
                <div className="category">
                    <Select onChange={({ value }) => filterDispatch({ language: value })} options={languages} placeholder='Language' />
                </div>
            </div>
            <div className="col-md-2 col-sm-4 mb-sm-1 mb-1">
                <ReactDatePicker className='col-md-2' onChange={(startDate) => filterDispatch({ startDate })} dateFormat='dd.MM.yyyy' placeholderText='Start date' selected={filters.startDate} />
            </div>
            <div className="col-md-2 col-sm-4 mb-sm-1 mb-1">
                <ReactDatePicker className='col-md-2' onChange={(endDate) => filterDispatch({ endDate })} dateFormat='dd.MM.yyyy' placeholderText='End date' selected={filters.endDate} />
            </div>
        </div>
    );
};

export default Filters;