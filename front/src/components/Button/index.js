import './index.css';

const Button = ({ text, children, className = '', ...rest }) => (
    <div className="form-group">
        <button
            type="button"
            className={'btn btn-custom form-control btn-h-50 ' + className}
            {...rest}
        >
            {text || children}
        </button>
    </div>
);

export default Button;