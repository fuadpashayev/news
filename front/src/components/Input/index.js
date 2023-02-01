import { forwardRef } from "react";
import { slugify } from "utils";

import './index.css'

const Input = forwardRef(({ 
    label = '',
    placeholder = '',
    type = 'text',
    error = '',
    ...rest
}, ref) => {
    const id = slugify(label) || slugify(placeholder);
    return (
        <div className="form-group">
            {label && <label htmlFor={id}>{label}</label>}
            <input
                id={id}
                className="form-control input"
                placeholder={placeholder}
                type={type}
                ref={ref}
                {...rest}
            />
            {error && <p className="text-danger">{error}</p>}
        </div>
    );
});

export default Input;