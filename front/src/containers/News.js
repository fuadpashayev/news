import { useCallback, useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
import { fetchNews } from "state/modules/news/newsSlice";
import { comparable, slugify } from "utils";
import useAuth from "hooks/useAuth";
import NewsCard from "pages/Home/components/NewsCard";

const News = () => {
    const dispatch = useDispatch();
    const news = useSelector((state) => state.news);
    const { language, category } = useSelector((state) => state.settings.data || {});
    const filters = useSelector((state) => state.filters);
    const { isLoggedIn } = useAuth();

    useEffect(() => {
        const filterData = generateFilterData();
        dispatch(fetchNews(filterData));
    }, [comparable(filters), language, category]);

    const generateFilterData = useCallback(() => {
        const filterData = { ...filters };
        if (isLoggedIn && (language || category)) {
            filterData.language ||= language;
            filterData.category ||= category;
        }
        return filterData;
    }, [comparable(filters), language, category]);

    return (
        <div className="row">
            {news.list.map((newsItem) => (
                <NewsCard key={slugify(Math.random().toString())} data={newsItem} />
            ))}

            {news.list.length === 0 && (
                <div className="col-12">
                    <div className="alert alert-info mt-2 mb-0">No news found</div>
                </div>
            )}
        </div>
    );
};

export default News;