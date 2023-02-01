import { useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { updateUserSettings } from "state/modules/user/settingsSlice";
import { updateUserData } from "state/modules/user/userSlice";
import UserInformation from "./components/UserInformation";
import Settings from "./components/Settings";
import Divider from "components/Divider";
import Button from "components/Button";
import Layout from "layout";

import './index.css';

const Profile = () => {
    const dispatch = useDispatch();
    const { user: { data: user }, settings: { data: settings } } = useSelector(state => state);
    const [userData, setUserData] = useState({});
    const [settingsData, setSettingsData] = useState({});

    const update = () => {
        if (userData.password.length > 0 || userData.name !== user.name) {
            dispatch(updateUserData(userData));
        }
        
        if (settingsData.category !== settings.category || settingsData.language !== settings.language) {
            dispatch(updateUserSettings(settingsData));
        }
    };

    return (
        <Layout>
            <div className="row">
                <UserInformation onChange={data => setUserData(data)} user={user} />
                <Settings onChange={data => setSettingsData(data)} settings={settings} />
                <Divider text='once you save, your news feed will be updated' />
                <Button className="save-button" text='Save' onClick={update} />
            </div>
        </Layout>
    );
}

export default Profile;