import { render, screen } from '@testing-library/react';
import LocationComponent from '../../component/Location/LocationComponent';
import { useFetchLocations } from '../../component/Location/useFetchLocations';

jest.mock('../../component/Location/useFetchLocations', () => ({
  useFetchLocations: jest.fn(),
}));

describe('LocationComponent', () => {
  test('displays loading spinner while data is loading', () => {
    (useFetchLocations as jest.Mock).mockReturnValue({
      data: [],
      loading: true,
      error: null,
    });

    render(<LocationComponent />);

    expect(screen.getByRole('progressbar')).toBeInTheDocument();
  });

  test('displays error message when there is an error', () => {
    (useFetchLocations as jest.Mock).mockReturnValue({
      data: [],
      loading: false,
      error: 'Failed to fetch locations',
    });

    render(<LocationComponent />);

    expect(screen.getByText('Failed to fetch locations')).toBeInTheDocument();
  });

  test('displays location cards when data is successfully fetched', () => {
    (useFetchLocations as jest.Mock).mockReturnValue({
      data: [
        {
          code: 'loc1',
          name: 'Location One',
          image: 'https://via.placeholder.com/150',
          creationDate: '2023-11-27',
        },
        {
          code: 'loc2',
          name: 'Location Two',
          image: 'https://via.placeholder.com/150',
          creationDate: '2023-11-26',
        },
      ],
      loading: false,
      error: null,
    });

    render(<LocationComponent />);

    expect(screen.getByText('Location One')).toBeInTheDocument();
    expect(screen.getByText('Location Two')).toBeInTheDocument();
    expect(screen.getAllByRole('img')).toHaveLength(2);
  });

  test('displays "No locations available" when data is empty', () => {
    (useFetchLocations as jest.Mock).mockReturnValue({
      data: [],
      loading: false,
      error: null,
    });

    render(<LocationComponent />);

    expect(screen.getByText('No hay registros')).toBeInTheDocument();

    const locationItems = screen.queryAllByRole('img');
    expect(locationItems).toHaveLength(0);
  });
});
