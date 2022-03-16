import React from 'react';
import Shore from './Shore';

export default function TodoList({shores}) {

    return (
        <div className="bg-white p-8 my-4 rounded-lg">
            <p className="relative mt-6 ml-20 mr-96 font-bold text-xl">Lista de tareas</p>
            <div className="flex flex-col m-6 ml-20 min-w-full">
                <div className="sm:-mx-6 lg:-mx-8 min-w-full">
                    <div className="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div className="overflow-y-scroll max-h-80 min-w-full shadow-md sm:rounded-lg">
                            <table className="min-w-full">
                                <thead className="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" className="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Name
                                        </th>
                                        <th scope="col" className="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Descripción
                                        </th>
                                        <th scope="col" className="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Fecha
                                        </th>
                                        <th scope="col" className="relative py-3 px-6">
                                            <span className="sr-only">Ver descripción</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {
                                        shores?.map(d => (
                                            <Shore
                                                {...d}
                                                key={d.id}
                                            />
                                        ))
                                    }
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
