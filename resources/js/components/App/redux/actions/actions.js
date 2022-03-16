import { AppService } from "../../service/AppService";
import { PROPERTIES } from "./types";

export const getProperty = propertyId => async dispatch => {

    try {
        const res = await AppService.getProperty(propertyId);
        dispatch({
            type: PROPERTIES.GET_PROPERTY,
            data: res.data
        });

    } catch (error) {

        console.log(error);
    }
};

export const createShore = (values, propertyId) => async dispatch => {

    try {
        const res = await AppService.createShore(values, propertyId);

        dispatch({
            type: PROPERTIES.ADD_SHORE,
            newShore: res.data
        });
        dispatch(getProperty(propertyId));

    } catch (error) {

        console.log(error);
    }
};
