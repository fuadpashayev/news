import { useSelector } from 'react-redux';
import Layout from 'layout';
import News from 'containers/News';
import Filters from './components/Filters';
import './index.css';

const Home = () => {
    const { status } = useSelector(state => state.news);
    return (
        <Layout loader={status === 'loading'}>
            <h4 className="title">Latest News</h4>
            <Filters />
            <News />
        </Layout>
    );
}

export default Home;