import React, { useEffect } from 'react';
import { render } from 'react-dom';
import { Provider, useSelector, useDispatch } from 'react-redux';
import AddShore from './AddShore';
import { getProperty } from './redux/actions/actions';
import store from './redux/store/store';
import TodoList from './TodoList';

const getPurposeStatusName = (purpose_status_id) => {

   if(purpose_status_id == 3 || purpose_status_id == 17)
            return "sold";
        else if(purpose_status_id == 5 || purpose_status_id == 16)
            return "under offer";
        else if(purpose_status_id == 1 || purpose_status_id == 15)
            return "for sale";
        else if(purpose_status_id == 12)
            return "option owner s.";
        else 
            return "owner r.";
};

export default function App() {

    const url = window.location.href.split("/");
    const propertyId = url[url.length - 1];

    const property = useSelector(state => state.AppReducer);
    const dispatch = useDispatch();

    const navigateToDashboard = () => {
        window.location.href = `/cactus-inmo/public/properties`;
    };

    useEffect(() => {
        dispatch(getProperty(propertyId));
    }, [propertyId]);

    setTimeout(() => {
        console.log(property);
    }, 1000);
    

    return (
        <>
            <button onClick={navigateToDashboard}
                className="absolute mt-12 right-24 px-4 py-2 bg-gray-800 border border-black rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Regresar al dashboard
            </button>
            <section className='ml-24'>
                <h1 className="font-bold text-3xl pt-12" >{property.currentProperty.name}</h1>
                <p className="relative mt-4 mr-96 font-bold text-xl">ID: {property.currentProperty.id}</p>
                <p className="relative mt-4 mr-96 font-bold text-xl">Estado:  {getPurposeStatusName(property.currentProperty.purpose_status)}</p>
            </section>
            <div className="flex flex-col-2">
                <AddShore
                    propertyId={propertyId}
                />
                <TodoList
                    shores={property.currentProperty.shores}
                />
            </div>
        </>
    );
}

if (document.getElementById("app")) {
    render(
        <Provider store={store}>
            <App />
        </Provider>,
        document.getElementById("app"));
}
