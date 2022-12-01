using UnityEngine;

namespace NDIGame
{

    [System.Serializable]
    public class Waypoint
    {

        [SerializeField] private int[] next;
        [SerializeField] private Vector2 position;

        public Vector2 Position => position;

        public int this[uint index]
        {
            get => next[UnityEngine.Random.Range(0, next.Length)];
        }

    }

    [System.Serializable]
    public class Path
    {

        [SerializeField] private Waypoint[] path;
        [SerializeField] private int startingPoint;

        public int StartingPoint => startingPoint;

        public Waypoint this[uint index]
        {
            get => path[index];
        }

    }

}
