import { createStore, combineReducers, compose, applyMiddleware } from 'redux';
import thunk from 'redux-thunk';
import { AppReducer } from '../reducer/AppReducer';

const reducers = combineReducers({
    AppReducer
});

const middlewares = [];
const enhancers = [];

middlewares.push(thunk);

enhancers.push(applyMiddleware(...middlewares));

const store = createStore(reducers, compose(...enhancers));

export default store;