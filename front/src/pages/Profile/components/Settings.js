import { memo, useEffect, useState } from "react";
import { useSelector } from "react-redux";
import Select from "react-select";

const Settings = ({ settings, onChange }) => {
    const { categories, languages } = useSelector(state => state.filterItems);

    const selectedCategory = categories.find(item => item.value === settings.category);
    const selectedLanguage = languages.find(item => item.value === settings.language);

    const [category, setCategory] = useState(selectedCategory);
    const [language, setLanguage] = useState(selectedLanguage);
    
    useEffect(() => {
        onChange({
            category: category?.value || 'all',
            language: language?.value || 'en',
        });
    }, [category, language]);

    return (
        <div className='col-md-6 col-sm-12 mb-120'>
            <div className='title'>Settings</div>
            <div className="categories">
                <Select
                    onChange={(item) => setLanguage(item)}
                    options={languages}
                    placeholder='Preferred news language'
                    value={language || selectedLanguage}
                />

                <Select
                    onChange={(item) => setCategory(item)}
                    options={categories}
                    placeholder='Preferred news category'
                    value={category || selectedCategory}
                />
            </div>
        </div>
    );
};

export default memo(Settings);