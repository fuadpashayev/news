import cx from 'classnames';

import './index.css'

export const LayerLoader = ({ isVisible = false }) => (
    <div className={cx('layer-loader', {'show': isVisible})}>
        <span className='loader'></span>
    </div>
);