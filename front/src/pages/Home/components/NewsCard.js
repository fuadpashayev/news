import { formatDate } from "utils";

import './NewsCard.css';

const NewsCard = ({ data }) => {
    const { title, source, publishedAt, imageUrl = '/placeholder.webp', url } = data;
    const renderedTitle = title.length > 150 ? `${title.substring(0, 150)}...` : title;
    
    return (
        <div className="col-md-6 col-lg-4 col-xl-3 mb-2">
            <div className="news-card">
                <a href={url} target="_blank" rel="noreferrer">
                    <div className="news-card-container">
                        <img loading="lazy" className="news-card-image" src={imageUrl || '/placeholder.webp'} alt={title} />
                        <div className="news-card-content">
                            <div className="news-card-category">{source}</div>
                            <div className="news-card-title">{renderedTitle}</div>
                            <div className="news-card-date">{formatDate(publishedAt)}</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    );
};

export default NewsCard;