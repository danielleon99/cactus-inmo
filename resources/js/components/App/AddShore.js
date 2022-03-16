import React, { useEffect, useState } from 'react';
import { useDispatch } from 'react-redux';
import { createShore } from './redux/actions/actions';

const validateForm = () => {

    return false;

};

export default function AddShore({ propertyId }) {

    const [error, setError] = useState(false)
    const dispatch = useDispatch();
    const [formState, setFormState] = useState({
        values: {
            name: "",
            description: "",
            date: ""
        },
    });

    useEffect(() => {

        setFormState(formState => ({
            ...formState,
        }));

    }, [formState.values]);

    const handleChange = event => {
        event.persist();

            setFormState(formState => ({
                ...formState,
                values: {
                    ...formState.values,
                    [event.target.name]: event.target.value,
                },
                touched: {
                    ...formState.touched,
                    [event.target.name]: true
                }
            }));
    };

    const handleOnClick = e => {
        e.preventDefault();

        if (formState.values.name.trim() === ""
            || formState.values.description.trim() === ""
            || formState.values.date === "")
        {
            setError(true)
            setTimeout(() => {
                setError(false)
            }, 2000);
        }
        else {
         
            dispatch(createShore(formState.values, propertyId));
        
        setFormState({
            values: {
                name: "",
                description: "",
                date: ""
            }
        });
    }
    };


    return (
        <div className="bg-white ml-12 p-8 my-4 rounded-lg">
            <p className="relative mt-4 ml-4 mr-96 font-bold text-xl">Agregar tarea</p>
            
            <section className="mt-6">

                { error? <div class="bg-red-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">Debe llenar todos los campos</p>
                    </div>
                </div>
            </div> : null}

                
                <form
                    noValidate
                    onSubmit={handleOnClick}>

                    <div className="flex flex-col-2">
                        
                        <div className="mb-6 w-72 pt-3 rounded">
                            <input

                                name="name"
                                onChange={handleChange}
                                required
                                value={formState.values.name || ''}

                                placeholder='Inserte el nombre de la tarea'
                                type="text" id="name"
                                className="border border-solid border-black rounded w-full text-gray-700 focus:outline-none border-black-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
                            </input>
                        </div>
                        <div className="mb-6 pt-3 ml-16 rounded">
                            <input

                                name="date"
                                onChange={handleChange}
                                required
                                value={formState.values.date || ''}

                                type="date" id="date"
                                className="border border-solid border-black rounded w-full text-gray-700 focus:outline-none border-black-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
                            </input>
                        </div>
                    </div>
                    <div className="mb-6 pt-3 rounded">
                        <textarea

                            name="description"
                            onChange={handleChange}
                            required
                            value={formState.values.description || ''}

                            placeholder="Descripción de la tarea" cols="30" rows="9" id="description"
                            className="border border-solid border-black rounded w-full text-gray-700 focus:outline-none border-black-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
                        </textarea>
                    </div>
                    <button
                        className="w-24 px-4 py-2 bg-gray-800 border border-black rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" type="submit">
                        Añadir</button>
                </form>
            </section>
        </div>
    );
}
