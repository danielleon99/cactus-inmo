import { PROPERTIES } from "../actions/types";

const initialState = {

    currentProperty: {},
    newShore: {},
};

export const AppReducer = (state = initialState, action) => {
    switch (action.type) {
        case PROPERTIES.GET_PROPERTY:
            return {
                ...state,
                currentProperty: action.data
            };
        case PROPERTIES.ADD_SHORE:
            return {
                ...state,
                newShore: action.data
            };
        default:
            return state;
    }
};