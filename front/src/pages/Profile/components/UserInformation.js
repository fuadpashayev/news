import { memo, useEffect, useState } from "react";
import Input from "components/Input";

const UserInformation = ({ user, onChange }) => {
    const [name, setName] = useState(user.name);
    const [password, setPassword] = useState('');

    useEffect(() => {
        onChange({ name, password });
    }, [name, password]);

    useEffect(() => {
        setName(user.name);
    }, [user.name]);

    return (
        <div className='col-md-6 col-sm-12 mb-5'>
            <div className="title">Profile</div>
            <Input type='text' placeholder='Name' defaultValue={name} onChange={e => setName(e.target.value)} />
            <Input type='password' placeholder='Password' value={password} onChange={e => setPassword(e.target.value)} />
        </div>
    );
}

export default memo(UserInformation);