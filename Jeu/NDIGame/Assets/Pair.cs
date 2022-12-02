using UnityEngine;

namespace NDIGame
{

    [System.Serializable]
    public class Pair<T, U>
    {

        [SerializeField] private T first;
        [SerializeField] private U second;

        public T First
        {
            get => first;
            set { first = value; }
        }

        public U Second
        {
            get => second;
            set { second = value; }
        }

    }

}